@extends('layouts.admin', ['page_title' => $product->translate('title')])

@section('content')

    <section id="content">
        <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-lg-9">
                    <block-editor title="{{ $product->translate('title') }}">
                        @foreach(config('app.locales') as $lang)
                            <fieldset slot="{{ $lang }}">
                                <div class="form-group{{ $errors->has($lang.'.title') ? ' is-invalid' : '' }}">
                                    <label for="title">Название товара</label>
                                    <input type="text" class="form-control" id="title" name="{{$lang}}[title]"
                                           value="{{ old($lang.'.title') ?? $product->translate('title', $lang) }}"
                                           required>
                                    @if($errors->has($lang.'.title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first($lang.'.title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Краткое описание товара</label>
                                    <input type="text" class="form-control" id="description"
                                           name="{{$lang}}[description]"
                                           value="{{ old($lang.'.description') ?? $product->translate('description', $lang) }}">
                                </div>

                                <label>Полное описание товара</label>
                                <wysiwyg name="{{$lang}}[body]" class="mb-0"
                                         content="{{ old($lang.'.body') ?? $product->translate('body', $lang) }}"></wysiwyg>
                            </fieldset>
                        @endforeach

                        <multi-image-uploader
                                class="mt-4"
                                :src="{{ json_encode($product->images_list) }}"></multi-image-uploader>
                    </block-editor>
                </div>

                <div class="col-lg-3">
                    <div class="form-group{{ $errors->has('price') ? ' is-invalid' : '' }}">
                        <label for="price">Цена</label>
                        <input type="number" min="0.01" step="0.01" class="form-control" id="price" name="price"
                               value="{{ old('price') ?? $product->price }}" required>
                        @if($errors->has('price'))
                            <div class="mt-1 text-danger">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($categories->count())
                            <label>Категории</label>

                            <div class="d-flex flex-wrap">
                                @foreach($categories as $category)
                                    <div class="border py-1 px-2 mr-3 mb-2 rounded">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="category-{{ $category->id }}" name="categories[]"
                                                   value="{{ $category->id }}" {{ $product->categories->pluck('id')->contains($category->id) ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                   for="category-{{ $category->id }}">
                                                {{ $category->translate('title') }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group my-4">
                <div class="custom-control custom-checkbox ml-3">
                    <input type="checkbox" class="custom-control-input"
                           id="stock" name="in_stock" {{ $product->in_stock ? 'checked' : '' }}>
                    <label class="custom-control-label" for="stock">Есть в наличии</label>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button class="btn btn-primary">Сохранить</button>

                <div class="custom-control custom-checkbox ml-3">
                    <input type="checkbox" class="custom-control-input"
                           id="published" name="is_published"
                            {{ $product->is_published ? 'checked' : '' }}>
                    <label class="custom-control-label" for="published">Опубликовать</label>
                </div>

                <div class="ml-4">
                    <div class="custom-control custom-checkbox ml-3">
                        <input type="checkbox" class="custom-control-input"
                               id="regenerate" name="regenerate">
                        <label class="custom-control-label" for="regenerate">Сгенерировать новый слаг</label>
                    </div>
                </div>
            </div>
            <h2 class="mt-4">Бухгалтерия</h2>
            @if($statuses->count() > 0 && $suppliers->count() > 0)
            <div class="row">
                <div class="form-group col-6">
                    <label for="date">Дата</label>
                    <input type="date" id="date" class="form-control" name="accountings[date]" value="{{ $product->accountings->date ?? '' }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="status">Статус</label>
                    <select name="accountings[status_id]" id="status" class="form-control">
                        <option value="">-------</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ $status->id === $product->accountings->status_id ? 'selected' : '' }}>
                                {{ $status->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="supplier">Поставщик</label>
                    <select name="accountings[supplier_id]" id="supplier" class="form-control">
                        <option value="">-------</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id === $product->accountings->supplier_id ? 'selected' : '' }}>
                                {{ $supplier->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="whom">Чье</label>
                    <input type="text" class="form-control" id="whom" name="accountings[whom]" value="{{ $product->accountings->whom ?? '' }}">
                </div>
            </div>
            <accountings :message="{{$product->accountings->message ?? "['']"}}" :price="{{$product->accountings->price ?? "['0']" }}"></accountings>
            @else
                <p>Для ведения бухгалтерии сначала создайте:
                    @if($suppliers->count() == 0)
                        <a href="{{route('admin.suppliers.create')}}" class="btn btn-outline-primary">Поставщиков</a>
                    @endif
                    @if($statuses->count() == 0)
                        <a href="{{route('admin.statuses.create')}}" class="btn btn-outline-primary">Cтатусы</a>
                    @endif
                </p>
            @endif
        </form>
    </section>

@endsection
