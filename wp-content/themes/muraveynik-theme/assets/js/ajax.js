document.addEventListener('DOMContentLoaded', () => {

    const container = document.querySelector('.products');
    if (!container) return;

    let currentPage = 1;
    let maxPages = parseInt(container.dataset.maxPages || 1);
    let loading = false;
    let scrollLock = false;

    // =========================
    // SYNC (после фильтра)
    // =========================
    function syncPagination() {
        currentPage = 1;
        maxPages = parseInt(container.dataset.maxPages || 1);

        scrollLock = true;
        setTimeout(() => scrollLock = false, 400);
    }

    // =========================
    // LOAD MORE
    // =========================
    async function loadMore() {

        if (loading) return;
        if (currentPage >= maxPages) return;

        loading = true;
        currentPage++;

        const data = new URLSearchParams();
        data.append('action', 'load_more_products');
        data.append('page', currentPage);

        // 🔥 если включены фильтры
        if (window.cwcIsFiltering && window.cwcFilters) {
            Object.entries(window.cwcFilters).forEach(([key, val]) => {
                data.append(key, val);
            });
        }

        const res = await fetch(cwc_ajax_object.ajax_url, {
            method: 'POST',
            body: data
        });

        const html = await res.text();

        if (html.trim()) {
            container.insertAdjacentHTML('beforeend', html);
        }

        loading = false;
    }

    // =========================
    // SCROLL
    // =========================
    window.addEventListener('scroll', () => {

        if (loading) return;
        if (scrollLock) return;
        if (currentPage >= maxPages) return;

        const scroll = window.scrollY + window.innerHeight;
        const trigger = document.body.offsetHeight - 300;

        if (scroll < trigger) return;

        loadMore();
    });

    // =========================
    // СОБЫТИЕ ОТ ФИЛЬТРОВ
    // =========================
    document.addEventListener('cwc_filters_applied', () => {
        syncPagination();
        loading = false;
    });

});