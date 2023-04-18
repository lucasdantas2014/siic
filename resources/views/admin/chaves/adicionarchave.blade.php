@extends('layouts.admin')

@section('conteudo')

    <div class="container justify-content-center align-items-center" style = "width:998px">
                <form action="storechave" method="get" class = "d-flex flex-column align-items-center">
                        <h4 class="mb-4 mt-1" >Adicionar Chave</h4>
                        <label><h5>Nome da chave</h5></label>
                        <input   class = "form-control" style = "width:20rem" type="text" name="nomelab" placeholder = "Digite o nome da chave aqui">


                        <label class = "mt-4 "><h5>Categoria do laboratório</h5></label>
                        <select name="categoria" id = "categoria" class = "form-control-lg">
                                    <option selected value = "#">Busque por categoria</option>
                                    <option value="Mineração">Mineração</option>
                                    <option value="Física">Física</option>
                                    <option value="Matematica">Matemática</option>
                                    <option value="Linguagens e Códigos">Linguagens e Códigos</option>
                                    <option value="Biologia">Biologia</option>
                                    <option value="Humanas">Humanas</option>
                                    <option value="Ginásio">Ginásio</option>
                                    <option value="Petróleo e Gás">Petróleo e Gás</option>
                                    <option value="Informática">Informática</option>
                                    <option value="Quimíca">Química</option>
                                    <option value="Ambiente Administrativo">Ambiente Administrativo</option>
                                    <option value="Construção de Edifícios">Construção de Edifícios</option>
                        </select>

                        <label for = "descricao" class = "mt-4"><h5>Descrição</h5></label>
                        <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre o laboratório"></textarea>

                        <input class = "btn btn-success btn-md m-3"  type="submit" value="Adicionar">
                </form>
            </div>
@endsection()
