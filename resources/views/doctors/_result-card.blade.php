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
                {{ $doctor->clinic()->get()->first()->phone_number }}
            </p>
            <p class="doctor-address">
                <i class="fas fa-map-marker-alt"></i>
                {{ $doctor->clinic()->get()->first()->address }}
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
                        @php
                            $date = date('Y-m-d');
                        @endphp
                        @while (strtotime($date) <= strtotime('+1 week'))
                            <div class="calendar-day">
                                <div class="calendar-day-date">
                                    <span class="day-name">{{ date('D', strtotime($date)) . '.' }}</span>
                                    <span class="day-date">{{ date('d M', strtotime($date)) }}</span>
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
                            @php
                                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                            @endphp
                        @endwhile
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