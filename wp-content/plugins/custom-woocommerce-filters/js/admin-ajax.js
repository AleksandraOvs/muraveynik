document.addEventListener('DOMContentLoaded', () => {

    const filtersWrapper = document.querySelector('.sidebar-area-wrapper._filters');
    const productsWrapper = document.querySelector('.products');

    if (!filtersWrapper || !productsWrapper) return;

    // =========================
    // GLOBAL STATE
    // =========================
    window.cwcFilters = {};
    window.cwcIsFiltering = false;

    let currentPage = 1;
    let maxPages = parseInt(productsWrapper.dataset.maxPages || 1);
    let loading = false;

    // =========================
    // SYNC PAGINATION
    // =========================
    function syncPagination() {
        currentPage = 1;
        maxPages = parseInt(productsWrapper.dataset.maxPages || 1);
        loading = false;
    }

    // =========================
    // GET FILTERS
    // =========================
    function getFiltersData() {

        const data = {
            action: 'cwc_filter_products',
            current_cat_id: filtersWrapper.dataset.currentCat || 0
        };

        const activeFilters = {};

        filtersWrapper.querySelectorAll('.filter-item.active').forEach(el => {

            const taxonomy = el.dataset.taxonomy;
            const slug = decodeURIComponent(el.dataset.slug);

            if (taxonomy && slug) {
                activeFilters[taxonomy] = slug;
            }
        });

        for (const [taxonomy, slug] of Object.entries(activeFilters)) {
            data['filter_' + taxonomy] = slug;
        }

        if (filtersWrapper.querySelector('.instock-filter.active')) {
            data.instock = 1;
        }

        return data;
    }

    // =========================
    // APPLY FILTERS
    // =========================
    function applyFilters() {

        const data = getFiltersData();

        productsWrapper.classList.add('loading');
        loading = true;

        fetch(cwc_ajax_object.ajax_url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(data)
        })
            .then(res => res.json())
            .then(res => {

                if (!res.success) {
                    console.warn('Ошибка фильтрации', res);
                    return;
                }

                // =========================
                // UPDATE PRODUCTS
                // =========================
                productsWrapper.innerHTML = res.data.html;

                // =========================
                // RESET PAGINATION STATE
                // =========================
                productsWrapper.dataset.currentPage = 1;
                productsWrapper.dataset.maxPages = res.data.max_pages || 1;

                syncPagination();

                // =========================
                // SAVE FILTER STATE
                // =========================
                window.cwcFilters = data;
                window.cwcIsFiltering = true;

                // =========================
                // EVENTS
                // =========================
                document.dispatchEvent(new Event('cwc_filters_applied'));

                // =========================
                // RESET SCROLL POSITION
                // =========================
                window.scrollTo(0, 0);
            })
            .finally(() => {
                productsWrapper.classList.remove('loading');
                loading = false;
            });
    }

    // =========================
    // FILTER CLICK
    // =========================
    filtersWrapper.addEventListener('click', (e) => {

        const filterItem = e.target.closest('.filter-item');
        if (!filterItem) return;

        e.preventDefault();

        const taxonomy = filterItem.dataset.taxonomy;

        if (filterItem.classList.contains('active')) {
            filterItem.classList.remove('active');
        } else {
            filtersWrapper
                .querySelectorAll(`.filter-item.active[data-taxonomy="${taxonomy}"]`)
                .forEach(el => el.classList.remove('active'));

            filterItem.classList.add('active');
        }

        applyFilters();
    });

    // =========================
    // APPLY / RESET BUTTONS
    // =========================
    filtersWrapper.addEventListener('click', (e) => {

        if (e.target.matches('#cwc-apply-filters')) {
            applyFilters();
        }

        if (e.target.matches('#cwc-reset-filters')) {

            filtersWrapper.querySelectorAll('.filter-item.active')
                .forEach(el => el.classList.remove('active'));

            window.cwcFilters = {};
            window.cwcIsFiltering = false;

            productsWrapper.dataset.currentPage = 1;
            productsWrapper.dataset.maxPages = 1;

            syncPagination();

            applyFilters();
        }
    });

});