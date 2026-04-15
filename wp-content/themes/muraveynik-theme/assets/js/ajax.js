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

document.addEventListener('DOMContentLoaded', () => {

    const container = document.querySelector('.products');
    if (!container) return;

    let currentPage = 1;
    let maxPages = parseInt(container.dataset.maxPages || 1);
    let loading = false;

    // 👇 ВОТ СЮДА — СИНХРОНИЗАЦИЯ
    function syncPagination() {
        currentPage = 1;
        maxPages = parseInt(container.dataset.maxPages || 1);
    }

    async function loadMore() {

        if (loading) return;
        if (currentPage >= maxPages) return;

        loading = true;
        currentPage++;

        const formData = new URLSearchParams();

        formData.append('action', 'load_more_products');
        formData.append('page', currentPage);

        // 🔥 ВАЖНО: передаём фильтры если они активны
        if (window.cwcIsFiltering && window.cwcFilters) {
            Object.entries(window.cwcFilters).forEach(([key, value]) => {
                formData.append(key, value);
            });
        }

        const res = await fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            body: formData
        });

        const html = await res.text();

        if (html.trim()) {
            container.insertAdjacentHTML('beforeend', html);
            document.dispatchEvent(new Event('productsLoaded'));
        }

        loading = false;
    }
    window.addEventListener('scroll', () => {

        if (loading) return;
        if (currentPage >= maxPages) return;

        const scroll = window.scrollY + window.innerHeight;
        const trigger = document.body.offsetHeight - 300;

        if (scroll < trigger) return;

        loadMore();
    });

});