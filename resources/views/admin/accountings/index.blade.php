@extends('layouts.admin', ['page_title' => 'Бухгалтерия'])

@section('content')
    <section id="content">
        <div class="d-flex align-items-center mb-5">
            <h1 class="h3 mb-0">Бухгалтерия</h1>
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
                    <td colspan="6" class="text-center">Бухгалтерия пока не ведется</td>
                </tr>
            @endforelse
        </table>

        {{ $accountings->appends(request()->except('page'))->links() }}
    </section>

@endsection