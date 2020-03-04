@extends('layouts.admin', ['page_title' => 'Бухгалтерия'])

@section('content')
    <section id="content">
        <div class="d-flex align-items-center mb-5">
            <h1 class="h3 mb-0">Бухгалтерия</h1>
        </div>
        <table class="table table-striped">
            <thead>
            <tr class="small">
                <th>Название</th>
                <th>Статус</th>
                <th>Поставщик</th>
                <th>Чье</th>
                <th class="text-center">Себестоимость</th>
            </tr>
            </thead>
            @forelse($accountings as $accounting)
                <tr>
                    <td width="280">
                        <a href="{{ route('admin.products.edit', $accounting->product) }}" class="underline">
                            {{ $accounting->product->title }}
                        </a>
                    </td>
                    <td>
                        {{ $accounting->status }}
                    </td>
                    <td class="text-center">{{ $accounting->supplier }}</td>
                    <td class="text-center">{{ $accounting->whom }}</td>
                    <td width="150" class="small">

                    </td>
                    <td width="100">
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