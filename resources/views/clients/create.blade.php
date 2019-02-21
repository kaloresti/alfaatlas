@extends('layouts.app')

@section('content')
@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
@if (session('success'))
   <div class="alert alert-success">
       {{ session('success') }}
   </div>
@endif
        <div class="card border-primary">
            <div class="card-header">
                Novo Cliente 
            </div>
            <div class="card-body">
            <form action="/clients/store" method="POST">
            @csrf
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj">
                </div>
                <div class="form-group">
                    <label for="incricao_estatudal">Inscrição Estadual</label>
                    <input type="text" class="form-control" name="incricao_estatudal">
                </div>
                <div class="form-group">
                    <label for="razao_social">Razão Social</label>
                    <input type="text" class="form-control" name="razao_social">
                </div>
                <div class="form-group">
                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input type="text" class="form-control" name="nome_fantasia">
                </div>
                <div class="form-group">
                    <label for="nome_responsavel">Responsável</label>
                    <input type="text" class="form-control" name="nome_responsavel">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="phone" class="form-control" name="telefone">
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="phone" class="form-control"  name="celular">
                </div>
                <div class="form-group">
                    <label for="email_principal">E-Mail</label>
                    <input type="email" class="form-control"  name="email_principal">
                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control"  name="logradouro">
                </div>
                <div class="form-group">
                    <label for="numero">Numero</label>
                    <input type="number" class="form-control"  name="numero">
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control"  name="cep">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control"  name="bairro">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado">
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" name="pais">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status">
                        <label class="form-check-label" for="status">
                        Ativo
                        </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

            </div>
        </div>
@endsection
