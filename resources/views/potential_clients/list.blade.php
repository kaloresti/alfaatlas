@extends('layouts.app')

@section('content')
        <div class="card border-warning">
            <div class="card-header">
                Filtros 
                
            </div>
            <div class="card-body">

                <fieldset>
                    <legend>Filtros padrões</legend>
                        <div class="btn-group">
                            <select name="data_font" id="font">
                                <option value="-1">Fonte de dados</option>
                                <option value="google_places">Google Places</option>
                            </select>
                        </div>
                        <div class="btn-group">
                            <select name="data_cross" id="font">
                                <option value="-1">Permutar dados?</option>
                                <option value="yes">Sim</option>
                                <option value="no">Não</option>
                            </select>
                        </div>
                </fieldset>
                <br>
                <div class="card border-warning">
                    <div class="card-header">Categorias</div>
                    
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                @forelse($typePlaces as $type)
                                <div class="col-md-2">
                                    <div class="form-check" class="inline">
                                        <input style="display:inline" class="form-check-input" type="checkbox" value="{{$type}}" id="places_category" name="places_category">
                                        <label class="form-check-label" for="invalidCheck2">
                                            {{$type}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
               
                <br> <br>
                <div class="card border-warning">
                    <div class="card-header">Países</div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="btn-group col-md-12">
                                <div class="row">
                                    @forelse($allCountries as $country)
                                    <div class="col-md-4">
                                        <div class="form-check" class="inline">
                                            <input style="display:inline" class="form-check-input" type="checkbox" value="{{$country['formal_en']}}" id="country{{$country['formal_en']}}" name="country">
                                            <label class="form-check-label" for="country{{$country['formal_en']}}">
                                                {!! $country['formal_en'] !!}
                                            </label>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br> <br>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite nome de Cidades, Bairros, Ruas, CEPs" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Pesquisar</button>
                    </div>
                </div>

                <br> <br>
                <label for="validationDefault01">Digite nome de lugares (Apple, Microsoft, Mc Donalds)</label>
                <input type="text" class="form-control" id="text_places" name="text_places" placeholder="digite nome de lugares" value="">
                

                <br><br><br>

                <div style="text-align:center">
                    <button onclick="googleSearch()" class="btn btn-danger btn-lg" type="button">PESQUISAR</button>
                </div>

            </div>
        </div>

    <br>

        <div class="card border-warning">
            <div class="card-header">
            Lista
            <div class="btn-group pull-right" style="float:right;" role="group" aria-label="Basic example">
                    <button style="float:right" type="button" class="btn btn-primary pull-right">Exportar</button>
                </div>
            </div>
            <div class="card-body">
                <div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div>
                <br>  <br> 
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i2-prod.mirror.co.uk/incoming/article7450291.ece/ALTERNATES/s615/Signs-alert-customers-to-special-offer-deals-in-the-chilled-section.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function googleSearch()
            {
                alert("Oi !");
            }
        </script>


@endsection
