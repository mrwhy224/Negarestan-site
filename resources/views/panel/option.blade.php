@extends('panel.layout')


@section('content')

                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مشاهده  گزینه ها - آزمون {{ $quiz->title }}</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="{{ route('dashboards') }}" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="flex items-center">
                                        <a href="{{ route('quiz.list') }}" class="text-gray-500 hover:text-gray-700">آزمون ها</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="flex items-center">
                                        <a href="{{ route('quiz.question',['quiz'=>$quiz->id]) }}" class="text-gray-500 hover:text-gray-700">سوالات</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">گزینه ها</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <!-- Articles Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">متن سوال</th>
                                    <th class="px-4 py-3">گزینه</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                    
                                @forelse($options as $option)
                                    <tr>
                                        <td class="p-4">{{ $option->id }}</td>
                                        <td class="p-4">{{ $question->text }}</td>
                                        <td class="p-4">{{ $option->text }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-6 text-center text-gray-500"> موردی یافت نشد! </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $options->links() }}
                    </div>

@endsection
