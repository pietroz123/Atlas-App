
var calendarEl;
var calendar;

$(document).ready(function() {

    /**
     * Inicializa o Full Calendar
     */
    calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {

        // Traduções
        locale: 'pt-br',
        buttonText: {
            today:    'hoje',
            month:    'mês',
            week:     'semana',
            day:      'dia',
            list:     'lista'
        },

        // Configuração da barra de ferramentas
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
        },

        // Plugins
        plugins: [
            'interaction',
            'dayGrid',
            'timeGrid',
            'list',
        ],

        // Começa na visualização por semana
        defaultView: 'dayGridMonth',

        // Altura do calendário
        height: 800,

        // Eventos (vem do backend)
        eventSources: [
            {
                url: '/medico/agendamentos',
                type: 'GET',
                error: function(error) {
                    console.log(error);
                },
            },
        ],

        // Horário de Funcionamento
        businessHours: [
            {
                daysOfWeek: [ 1, 2, 3, 4, 5, 6 ],  // Segunda - Sábado
                startTime: '10:00',             // Horário de Início
                endTime: '18:00',               // Horário de Fim
            },
        ],

        nowIndicator: true,

        // Cor do texto
        eventTextColor: 'white',
        eventBorderColor: 'transparent',

        // Espaçamento entre slots de tempo
        slotDuration: '00:15:00', // 15 minutos

        // Limitação de Horários
        minTime: '10:00:00',
        maxTime: '18:00:00',

        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            omitZeroMinute: false,
            meridiem: 'short'
        },

        // Evento de Agendamento
        dateClick: function(info) {

        },
    });
    calendar.render();

});
