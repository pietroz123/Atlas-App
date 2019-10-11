<div class="row doctor-found">
    <div class="col doctor-details">
        <div class="doctor-img-container">
            <img src="{{ asset('img/doctorr.jpg') }}" class="doctor-img" alt="Humberto Cenci Guimarães">
        </div>
        <div class="doctor-info">
            <p class="doctor-specialty">{{ $doctor->specialties()->get()->pluck('name')->first() }}</p>
            <p class="doctor-name">
                <a href="{{ route('doctors.show', $doctor->id) }}">
                    {{ $doctor->full_name }}
                </a>
            </p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>(18 avaliações)</span>
            </div>
            <p class="doctor-phone">
                <i class="fas fa-phone-alt"></i>
                {{ $doctor->phone_number }}
            </p>
            <p class="doctor-address">
                <i class="fas fa-map-marker-alt"></i>
                {{ $doctor->address }}
            </p>
        </div>

        {{-- CALENDAR --}}
        <div class="doctor-calendar">
            <button class="calendar-nav calendar-nav-prev">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="calendar locked">
                <div class="lock-area">
                    
                    {{-- Essa é a div do SLICK --}}
                    <div class="calendar-schedule">

                        {{-- Essa div repete --}}
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Hoje</span>
                                <span class="day-date">13 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Sáb.</span>
                                <span class="day-date">14 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">08:00</a>
                                <a href="#!" class="calendar-slot available">08:15</a>
                                <a href="#!" class="calendar-slot available">08:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">08:45</a>
                                <a href="#!" class="calendar-slot available">09:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:45</a>
                                <a href="#!" class="calendar-slot available">10:00</a>
                                <a href="#!" class="calendar-slot available">10:15</a>
                                <a href="#!" class="calendar-slot available">10:30</a>
                                <a href="#!" class="calendar-slot available">10:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Dom.</span>
                                <span class="day-date">15 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Seg.</span>
                                <span class="day-date">16 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Ter.</span>
                                <span class="day-date">17 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Quar.</span>
                                <span class="day-date">18 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Quin.</span>
                                <span class="day-date">19 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Sex.</span>
                                <span class="day-date">20 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Sáb.</span>
                                <span class="day-date">21 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">08:00</a>
                                <a href="#!" class="calendar-slot available">08:15</a>
                                <a href="#!" class="calendar-slot available">08:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">08:45</a>
                                <a href="#!" class="calendar-slot available">09:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">09:45</a>
                                <a href="#!" class="calendar-slot available">10:00</a>
                                <a href="#!" class="calendar-slot available">10:15</a>
                                <a href="#!" class="calendar-slot available">10:30</a>
                                <a href="#!" class="calendar-slot available">10:45</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Dom.</span>
                                <span class="day-date">22 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                                <a href="#!" class="calendar-slot empty">-</a>
                            </div>
                        </div>
                        <div class="calendar-day">
                            <div class="calendar-day-date">
                                <span class="day-name">Seg.</span>
                                <span class="day-date">23 Set</span>
                            </div>
                            <div class="calendar-day-slots d-flex flex-column">
                                <a href="#!" class="calendar-slot available">13:00</a>
                                <a href="#!" class="calendar-slot available">13:15</a>
                                <a href="#!" class="calendar-slot available">13:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:45</a>
                                <a href="#!" class="calendar-slot available">14:00</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:15</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:45</a>
                                <a href="#!" class="calendar-slot available">15:00</a>
                                <a href="#!" class="calendar-slot available">15:15</a>
                                <a href="#!" class="calendar-slot available">15:30</a>
                                <a href="#!" class="calendar-slot available">15:45</a>
                            </div>
                        </div>
                        {{-- Essa div repete --}}

                    </div>
                    {{-- Essa é a div do SLICK --}}

                </div>
                
                <button class="btn-view-more closed">Ver mais horários</button>
                

            </div>

            <button class="calendar-nav calendar-nav-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        {{-- END CALENDAR --}}

    </div>
    <div class="col-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.6077173877284!2d-47.46507688502323!3d-23.510635084708092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58a9305955f59%3A0xb878765355f9014d!2sAv.%20Bar%C3%A3o%20de%20Tatu%C3%AD%2C%20Sorocaba%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1570405930432!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>