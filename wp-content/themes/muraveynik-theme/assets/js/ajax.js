var button = $('#loadmore');

button.click(function (event) {
    event.preventDefault();


    $.ajax({
        type: 'POST',
        url: searching.ajax_url,
        data: {
            paged: button.data('paged'),
            action: 'loadmore'
        },
        beforeSend: function (xhr) {
            button.text('Загружаем...');
        },
        success: function (data) {

            button.parent().before(data);
            button.text('Смотреть ещё');
        }
    });

    //alert ('test');
});

document.addEventListener('input', e => {
    const input = e.target.closest('.search__input');
    if (!input) return;

    const form = input.closest('.search__form');
    const results = form.querySelector('.results');
    const query = input.value.trim();

    if (query.length < 2) {
        results.innerHTML = '';
        return;
    }

    const data = new FormData();
    data.append('action', 'ajax_search');
    data.append('query', query);

    fetch(ajaxSearch.url, {
        method: 'POST',
        body: data,
    })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                results.innerHTML = res.data;
            }
        });
});

