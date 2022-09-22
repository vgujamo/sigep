@extends('layouts.main')
@section('title','Cadastro de Sessao')
@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card mt-5 py-5 shadow-lg">
        <form action="/especie/{{ $especie->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nome da Especie</label>
                    <input type="text" class="form-control" name="nome" id="exampleInputEmail1" value="{{ $especie->nome }}">
                </div>
                <div class=" col-6">
                    <label for="InuptJuiz" class="form-label">Nome da Seccao</label>
                    <select class="form-select" name="sessao_id" aria-label="Default select example">
                        {{ $seccao = App\Models\Sessao::where('id', $especie->sessao_id)->first() }}
                        
                        <option value={{ $seccao->id ?? "" }} selected>{{ $seccao->name ?? "Escolha Seccao..." }}</option>
                        
                        {{ $seccao1 = App\Models\Sessao::all() }}
                     

                        @foreach ( $seccao1 as $item)
                        @if($item->id ?? '' != $seccao->id ?? '')
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="row mx-2">
                 <div class="col-sm">
                    <label for="InuptJuiz" class="form-label">Descricao da Especie</label>
                    <textarea class="form-control" id="id" name="descricao" rows="2" cols="">{{ $especie->descricao }}</textarea>
                 </div>
             </div>
            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{ $especie->criado_por }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por"  value="{{ auth()->user()->name }}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <button type="submit" class="btn btn-primary">Gravar</button>
                <a class="btn btn-secondary" href="/especie">Voltar <i class="bi bi-backspace"></i></a>
            </div>
        </form>
    </div>

</div>


@endsection


