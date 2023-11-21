@extends('anivers.layouts.app')

@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

<a href="{{  route('operacsdashboard')  }}" id="logout">Dashboard</a> <br><br>
    
<table class="table mt-5">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Convidado</th>
        <th scope="col">CPF</th>
        <th scope="col">Idade</th>
        <th scope="col">Status</th>
        <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @php
            $contador=0;
        @endphp
        @foreach ( $convidados as $convidado )
        @if ($convidado->status == 1)
                <tr>
                    <td scope="col">{{ ++$contador }}</td>
                    <td scope="col">{{ $convidado->nome }}</td>
                    <td scope="col">{{ $convidado->CPF }}</td>
                    <td scope="col">{{ $convidado->idade }}</td>
                    <td scope="col">
                        @if ($convidado->status === 1)
                            <p></p>
                        @elseif ($convidado->status == 2)
                            <p class="text-success">Presente</p>
                        @endif
                    </td>

                    @if ($convidado->status == 1)
                        <form action="{{ route('status.update', ['id' => $convidado->id]) }}" method="post">
                            @csrf
                            <td scope="col">            
                                <input type="hidden" name="novo_status" value="2">
                                <button type="submit" class="btn btn-success btn-sm">Presente</button>
                            </td>
                        </form>
                    @else
                        <td></td>
                    @endif
                        </form>
                </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:rgba(55, 140, 209, 0.692);
        }

    </style>
@endpush
