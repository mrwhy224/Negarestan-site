<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainPageController
{
    public function homePage()
    {
        return view('index', ['posts'=>Post::with('category','author')->orderBy('published_at', 'desc')->whereNotNull('published_at')->where('post_category_id', '!=', 4)->limit(5)->get(), 'classes'=> Post::orderBy('published_at', 'desc')->whereNotNull('published_at')->where('post_category_id', 4)->get()]);
    }

    public function blog(Request $request)
    {

        // شروع کوئری برای مدل Post به همراه روابط
        $postsQuery = Post::with('author', 'category');
        $postsQuery->whereNotNull('published_at');

        $postsQuery->whereHas('category', function ($query) {
            $query->where('id', '!=', 4);
        });
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $postsQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('category') && $request->category != '') {
            $postsQuery->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        $posts = $postsQuery->orderBy('published_at', 'desc')->paginate(9);

        $categories = PostCategory::where('id', '!=', 4)->get();

        return view('blog', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^09[0-9]{9}$/|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [

            'name.required' => 'فیلد نام و نام خانوادگی اجباری است.',
            'phone.required' => 'شماره تلفن اجباری است.',
            'phone.regex' => 'فرمت شماره تلفن صحیح نیست.',
            'phone.unique' => 'این شماره تلفن قبلاً ثبت شده است.',
            'password.required' => 'رمز عبور اجباری است.',
            'password.min' => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
            'password.confirmed' => 'رمز عبور و تکرار آن با هم مطابقت ندارند.',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 422); // Unprocessable Entity
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);


        // بازگرداندن پاسخ موفقیت
        return response()->json([
            'message' => 'ثبت نام شما با موفقیت انجام شد! به آموزشگاه آینده خوش آمدید.'
        ], 201); // Created
    }

    public function login(Request $request)
    {
        // مرحله ۱: اعتبارسنجی ورودی‌ها با پیام‌های فارسی
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'regex:/^09\d{9}$/'],
            'password' => ['required', 'string'],
        ], [
            // پیام‌های خطای سفارشی و فارسی
            'phone.required' => 'وارد کردن شماره تلفن الزامی است.',
            'phone.regex'    => 'فرمت شماره تلفن صحیح نیست. (مثال: 09123456789)',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
        ]);

        if ($validator->fails()) {
            // اگر اعتبارسنجی شکست خورد، خطاها را با کد 422 برمی‌گردانیم
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // مرحله ۲: بررسی وجود کاربر قبل از تلاش برای لاگین
        $user = User::where('phone', $request->phone)->first();

        // اگر کاربری با این شماره تلفن وجود نداشت، خطای مشخص برمی‌گردانیم
        if (!$user) {
            return response()->json([
                'error' => 'شماره تلفن یا رمز عبور اشتباه است.'
            ], 401);
        }

        // مرحله ۳: تلاش برای احراز هویت (حالا مطمئنیم که کاربر وجود دارد)
        $credentials = $request->only('phone', 'password');
        if (!Auth::attempt($credentials)) {
            // اگر تلاش ناموفق بود، یعنی رمز عبور اشتباه است
            return response()->json([
                'error' => 'شماره تلفن یا رمز عبور اشتباه است.'
            ], 401);
        }

        // مرحله ۴: موفقیت در ورود
        $request->session()->regenerate();

        return response()->json([
            'message' => 'ورود با موفقیت انجام شد. در حال انتقال...',
            'redirect_to' => route('dashboards'), // یا هر آدرس دیگری مثل /dashboard
        ], 200);
    }

    // متد username برای هماهنگی بیشتر با سیستم احراز هویت لاراول (اختیاری ولی توصیه شده)
    public function username()
    {
        return 'phone';
    }
    public function post(Post $post)
    {
        $processedContent = $this->processEditorJsContent($post->content);
        $post->processed_content = $processedContent;

        return view('single', compact('post'));
    }

    /**
     * پردازش محتوای JSON از Editor.js و تبدیل آن به HTML.
     *
     * @param  string  $contentJson
     * @return string
     */
    protected function processEditorJsContent(string $contentJson): string
    {
        $data = json_decode($contentJson, true);
        if (!is_array($data) || !isset($data['blocks'])) {
            return '';
        }

        $html = '';
        foreach ($data['blocks'] as $block) {
            $type = $block['type'];
            $blockData = $block['data'];

            switch ($type) {
                case 'header':
                    $level = $blockData['level'];
                    $text = $blockData['text'];
                    $html .= "<h{$level} class='text-right font-bold'>{$text}</h{$level}>";
                    break;
                case 'paragraph':
                    $text = $blockData['text'];
                    $html .= "<p class='text-justify leading-relaxed'>{$text}</p>";
                    break;
                case 'list':
                    $tag = ($blockData['style'] === 'unordered') ? 'ul' : 'ol';
                    $html .= "<{$tag} class='list-inside list-disc text-right my-4'>";
                    foreach ($blockData['items'] as $item) {
                        $html .= "<li>{$item}</li>";
                    }
                    $html .= "</{$tag}>";
                    break;
                case 'image':
                    $url = $blockData['file']['url'] ?? '';
                    $caption = $blockData['caption'] ?? '';
                    $html .= "<div class='text-center my-6'>";
                    $html .= "<img src='{$url}' alt='{$caption}' class='rounded-lg shadow-md inline-block max-w-full h-auto' style='direction: ltr;'>";
                    if ($caption) {
                        $html .= "<p class='text-sm text-gray-500 mt-2 italic'>{$caption}</p>";
                    }
                    $html .= "</div>";
                    break;
                case 'quote':
                    $text = $blockData['text'];
                    $caption = $blockData['caption'] ?? '';
                    $html .= "<blockquote class='border-r-4 border-gray-300 pr-4 my-4 italic text-gray-600'><p>{$text}</p>";
                    if ($caption) {
                        $html .= "<cite class='block text-right mt-2 not-italic'>{$caption}</cite>";
                    }
                    $html .= "</blockquote>";
                    break;
                default:
                    // برای سایر بلاک‌های ناشناس
                    $html .= "<p>Unsupported block type: {$type}</p>";
                    break;
            }
        }

        return $html;
    }
}
