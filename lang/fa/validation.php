<?php

return [

    /*
    |--------------------------------------------------------------------------
    | خطوط زبان اعتبارسنجی (Validation)
    |--------------------------------------------------------------------------
    |
    | خطوط زبان زیر شامل پیام‌های خطای پیش‌فرض مورد استفاده توسط
    | کلاس اعتبارسنجی است. برخی از این قوانین چندین نسخه دارند
    | مانند قوانین مربوط به اندازه. می‌توانید هر یک از این پیام‌ها را در اینجا تغییر دهید.
    |
    */

    'accepted' => 'فیلد :attribute باید تایید شود.',
    'accepted_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، باید تایید شود.',
    'active_url' => 'فیلد :attribute باید یک نشانی اینترنتی (URL) معتبر باشد.',
    'after' => 'فیلد :attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید تاریخی مساوی یا بعد از :date باشد.',
    'alpha' => 'فیلد :attribute فقط باید شامل حروف الفبا باشد.',
    'alpha_dash' => 'فیلد :attribute فقط باید شامل حروف الفبا، اعداد، خط تیره (-) و زیرخط (_) باشد.',
    'alpha_num' => 'فیلد :attribute فقط باید شامل حروف الفبا و اعداد باشد.',
    'array' => 'فیلد :attribute باید یک آرایه باشد.',
    'ascii' => 'فیلد :attribute فقط باید شامل کاراکترها و نمادهای الفبایی تک‌بایتی باشد.',
    'before' => 'فیلد :attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید تاریخی مساوی یا قبل از :date باشد.',
    'between' => [
        'array' => 'فیلد :attribute باید بین :min تا :max آیتم داشته باشد.',
        'file' => 'فایل :attribute باید بین :min تا :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بین :min تا :max باشد.',
        'string' => 'فیلد :attribute باید بین :min تا :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute فقط می‌تواند true یا false باشد.',
    'can' => 'مقدار فیلد :attribute غیرمجاز است.',
    'confirmed' => 'تاییدیه فیلد :attribute مطابقت ندارد.',
    'current_password' => 'رمز عبور نادرست است.',
    'date' => 'فیلد :attribute یک تاریخ معتبر نیست.',
    'date_equals' => 'فیلد :attribute باید تاریخی برابر با :date باشد.',
    'date_format' => 'فیلد :attribute با فرمت :format مطابقت ندارد.',
    'decimal' => 'فیلد :attribute باید :decimal رقم اعشار داشته باشد.',
    'declined' => 'فیلد :attribute باید رد شود.',
    'declined_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، باید رد شود.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min تا :max رقم باشد.',
    'dimensions' => 'فیلد :attribute دارای ابعاد تصویر نامعتبر است.',
    'distinct' => 'فیلد :attribute دارای یک مقدار تکراری است.',
    'doesnt_start_with' => 'فیلد :attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'doesnt_end_with' => 'فیلد :attribute نباید با یکی از موارد زیر خاتمه یابد: :values.',
    'email' => 'فیلد :attribute باید یک آدرس ایمیل معتبر باشد.',
    'ends_with' => 'فیلد :attribute باید با یکی از موارد زیر خاتمه یابد: :values.',
    'enum' => ':attribute انتخاب شده نامعتبر است.',
    'exists' => ':attribute انتخاب شده نامعتبر است.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید دارای مقدار باشد.',
    'gt' => [
        'array' => 'فیلد :attribute باید بیشتر از :value آیتم داشته باشد.',
        'file' => 'فایل :attribute باید بزرگتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بزرگتر از :value باشد.',
        'string' => 'فیلد :attribute باید بیشتر از :value کاراکتر باشد.',
    ],
    'gte' => [
        'array' => 'فیلد :attribute باید :value آیتم یا بیشتر داشته باشد.',
        'file' => 'فایل :attribute باید بزرگتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بزرگتر یا مساوی :value باشد.',
        'string' => 'فیلد :attribute باید بزرگتر یا مساوی :value کاراکتر باشد.',
    ],
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => ':attribute انتخاب شده نامعتبر است.',
    'in_array' => 'فیلد :attribute باید در :other وجود داشته باشد.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'lowercase' => 'فیلد :attribute باید با حروف کوچک باشد.',
    'lt' => [
        'array' => 'فیلد :attribute باید کمتر از :value آیتم داشته باشد.',
        'file' => 'فایل :attribute باید کوچکتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کوچکتر از :value باشد.',
        'string' => 'فیلد :attribute باید کمتر از :value کاراکتر باشد.',
    ],
    'lte' => [
        'array' => 'فیلد :attribute نباید بیشتر از :value آیتم داشته باشد.',
        'file' => 'فایل :attribute باید کوچکتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کوچکتر یا مساوی :value باشد.',
        'string' => 'فیلد :attribute باید کوچکتر یا مساوی :value کاراکتر باشد.',
    ],
    'mac_address' => 'فیلد :attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => 'فیلد :attribute نباید بیشتر از :max آیتم داشته باشد.',
        'file' => 'فایل :attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute نباید بزرگتر از :max باشد.',
        'string' => 'فیلد :attribute نباید بیشتر از :max کاراکتر باشد.',
    ],
    'max_digits' => 'فیلد :attribute نباید بیشتر از :max رقم داشته باشد.',
    'mimes' => 'فیلد :attribute باید فایلی از نوع :values باشد.',
    'mimetypes' => 'فیلد :attribute باید فایلی از نوع :values باشد.',
    'min' => [
        'array' => 'فیلد :attribute باید حداقل :min آیتم داشته باشد.',
        'file' => 'فایل :attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'string' => 'فیلد :attribute باید حداقل :min کاراکتر باشد.',
    ],
    'min_digits' => 'فیلد :attribute باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد :attribute باید وجود نداشته باشد.',
    'missing_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، باید وجود نداشته باشد.',
    'missing_unless' => 'فیلد :attribute باید وجود نداشته باشد، مگر اینکه :other برابر با :value باشد.',
    'missing_with' => 'فیلد :attribute در صورتی که :values موجود باشد، باید وجود نداشته باشد.',
    'missing_with_all' => 'فیلد :attribute در صورتی که :values موجود باشند، باید وجود نداشته باشد.',
    'multiple_of' => 'فیلد :attribute باید مضربی از :value باشد.',
    'not_in' => ':attribute انتخاب شده نامعتبر است.',
    'not_regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'password' => [
        'letters' => 'فیلد :attribute باید حداقل شامل یک حرف باشد.',
        'mixed' => 'فیلد :attribute باید حداقل شامل یک حرف بزرگ و یک حرف کوچک باشد.',
        'numbers' => 'فیلد :attribute باید حداقل شامل یک عدد باشد.',
        'symbols' => 'فیلد :attribute باید حداقل شامل یک نماد (symbol) باشد.',
        'uncompromised' => ':attribute وارد شده قبلاً در یک نشت اطلاعاتی دیده شده است. لطفاً یک :attribute دیگر انتخاب کنید.',
    ],
    'present' => 'فیلد :attribute باید موجود باشد.',
    'prohibited' => 'فیلد :attribute ممنوع است.',
    'prohibited_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، ممنوع است.',
    'prohibited_unless' => 'فیلد :attribute ممنوع است، مگر اینکه :other در :values باشد.',
    'prohibits' => 'فیلد :attribute، وجود :other را ممنوع می‌کند.',
    'regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_array_keys' => 'فیلد :attribute باید شامل ورودی‌هایی برای :values باشد.',
    'required_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، الزامی است.',
    'required_if_accepted' => 'فیلد :attribute هنگامی که :other پذیرفته شود، الزامی است.',
    'required_unless' => 'فیلد :attribute الزامی است، مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute در صورتی که :values موجود باشد، الزامی است.',
    'required_with_all' => 'فیلد :attribute در صورتی که :values موجود باشند، الزامی است.',
    'required_without' => 'فیلد :attribute در صورتی که :values موجود نباشد، الزامی است.',
    'required_without_all' => 'فیلد :attribute در صورتی که هیچ یک از :values موجود نباشند، الزامی است.',
    'same' => 'فیلد :attribute و :other باید مطابقت داشته باشند.',
    'size' => [
        'array' => 'فیلد :attribute باید شامل :size آیتم باشد.',
        'file' => 'فایل :attribute باید :size کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید :size باشد.',
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
    ],
    'starts_with' => 'فیلد :attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => ':attribute قبلاً انتخاب شده است.',
    'uploaded' => 'آپلود :attribute با شکست مواجه شد.',
    'uppercase' => 'فیلد :attribute باید با حروف بزرگ باشد.',
    'url' => 'فیلد :attribute باید یک نشانی اینترنتی (URL) معتبر باشد.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | خطوط زبان سفارشی برای اعتبارسنجی
    |--------------------------------------------------------------------------
    |
    | در اینجا می‌توانید پیام‌های اعتبارسنجی سفارشی برای فیلدها را با استفاده از
    | قرارداد "attribute.rule" برای نام‌گذاری خطوط مشخص کنید. این کار باعث
    | می‌شود تا بتوان به سرعت یک خط زبان سفارشی مشخص برای یک قانون فیلد معین تعیین کرد.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | نام‌های سفارشی برای فیلدهای اعتبارسنجی
    |--------------------------------------------------------------------------
    |
    | خطوط زبان زیر برای جایگزینی placeholder نام فیلد ما با چیزی
    | خواناتر مانند «آدرس ایمیل» به جای «email» استفاده می‌شود.
    | این به سادگی به ما کمک می‌کند تا پیام خود را گویاتر کنیم.
    |
    */

    'attributes' => [
        'phone' => 'شماره',
        'password' => 'رمز عبور',
    ],

];