@extends('layouts.app')

@section('title', 'Buscar Agendamentos')

@section('content')

    <section id="search-container">
        <div class="container">

            <div class="row">
                <div class="col">

                    <!-- Search Appointments -->
                    <form id="search-appointment">
                        <div class="box">
                            <h3>Encontre seu Agendamento</h3>
                            <div class="form-group">
                                <label for="location">Onde</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Selecione o local">
                            </div>
                            <div class="form-group">
                                <label for="specialty">Especialidade</label>
                                <select class="browser-default custom-select" id="specialty" name="specialty">
                                    <option selected>Selecione a especialidade</option>
                                    <option value="1">Oftalmologista</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nome (Opcional)</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escolha seu médico">
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-info">Buscar</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col">

                </div>
            </div>

        </div>
    </section>

@endsection