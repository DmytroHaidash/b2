@extends('layouts.admin', ['page_title' => 'Бухгалтерия'])

@section('content')
    <section id="content">
        <div class="d-flex align-items-center">
            <h1 class="h3 mb-0">Бухгалтерия</h1>
        </div>
        @if(request('status') || request('supplier'))
            <a href="{{ route('admin.accounting.index') }}"
               class="btn mt-2 btn-outline-primary mb-2">
                Сбросить фильтры
            </a>
        @endif
        <div class="mb-2">
            <p class="mb-0">Фильтрация по статусу:</p>
            @foreach($statuses as $status)
                <a href="?status={{ $status->id }}"
                   class="btn mr-2  mt-2 btn-{{ request('status') == $status->id ? 'primary' : 'outline-primary' }}">
                    {{$status->title}}
                </a>
            @endforeach
        </div>
        <div class="mb-2">
            <p class="mb-0">Фильтрация по поставщику:</p>
            @foreach($suppliers as $supplier)
                <a href="?supplier={{ $supplier->id }}"
                   class="btn mr-2 mt-2 btn-{{ request('supplier') == $supplier->id ? 'primary' : 'outline-primary' }}">
                    {{$supplier->title}}
                </a>
            @endforeach
        </div>

        <table class="table table-striped">
            <thead>
            <tr class="small">
                <th class="text-center">Название</th>
                <th class="text-center">Статус</th>
                <th class="text-center">Поставщик</th>
                <th class="text-center">Чье</th>
                <th class="text-center">Себестоимость
                <th></th>
            </tr>
            </thead>
            @forelse($accountings as $accounting)
                <tr>
                    <td width="280" class="text-center">
                        <a href="{{ route('admin.products.edit', $accounting->product) }}" class="underline">
                            {{ $accounting->product->title }}
                        </a>
                    </td>
                    <td class="text-center">
                        {{ $accounting->status->title ?? '' }}
                    </td>
                    <td class="text-center">{{ $accounting->supplier->title ?? '' }}</td>
                    <td class="text-center">{{ $accounting->whom }}</td>
                    <td width="150" class="small text-center">
                        {{$accounting->amount}}
                    </td>
                    <td width="100" class="text-right">
                        <a href="{{ route('admin.products.edit', $accounting->product) }}"
                           class="btn btn-warning btn-squire">
                            <i class="i-pencil"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        @if(request()->filled('status'))
                            Записей с таким статусом нет
                        @elseif(request()->filled('supplier'))
                            Записей с этим поставщиком нет
                        @else
                            Бухгалтерия пока не ведется
                        @endif
                    </td>
                </tr>
            @endforelse
        </table>

        {{ $accountings->appends(request()->except('page'))->links() }}
    </section>

@endsection