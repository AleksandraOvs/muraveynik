document.addEventListener('DOMContentLoaded', () => {

    const filtersWrapper = document.querySelector('.sidebar-area-wrapper._filters');
    const productsWrapper = document.querySelector('.products');

    if (!filtersWrapper || !productsWrapper) return;

    function getFiltersData() {
        const data = {
            action: 'cwc_filter_products',
            current_cat_id: filtersWrapper.dataset.currentCat || 0
        };

        const activeFilters = {};

        filtersWrapper.querySelectorAll('.filter-item.active').forEach(el => {
            const taxonomy = el.dataset.taxonomy; // ✅ теперь отсюда
            const slug = decodeURIComponent(el.dataset.slug);

            if (taxonomy && slug) {
                activeFilters[taxonomy] = slug; // одно значение на атрибут
            }
        });

        // собираем данные
        for (const [taxonomy, slug] of Object.entries(activeFilters)) {
            data['filter_' + taxonomy] = slug;
        }

        // в наличии
        if (filtersWrapper.querySelector('.instock-filter.active')) {
            data.instock = 1;
        }

        console.log('Filters data for AJAX:', data);

        return data;
    }

    function applyFilters() {
        const data = getFiltersData();

        productsWrapper.classList.add('loading');

        fetch(cwc_ajax_object.ajax_url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(data)
        })
            .then(res => res.json())
            .then(res => {
                console.log('Server debug info:', res);

                if (res.success) {
                    productsWrapper.innerHTML = res.data.html;
                } else {
                    console.warn('Ошибка фильтрации', res);
                }
            })
            .finally(() => {
                productsWrapper.classList.remove('loading');
            });
    }

    // клик по фильтру
    filtersWrapper.addEventListener('click', (e) => {
        const filterItem = e.target.closest('.filter-item');
        if (!filterItem) return;

        e.preventDefault();

        const taxonomy = filterItem.dataset.taxonomy; // ✅ теперь напрямую

        // если уже активен — снимаем
        if (filterItem.classList.contains('active')) {
            filterItem.classList.remove('active');
        } else {
            // ❗ убираем другие элементы этого же атрибута
            filtersWrapper.querySelectorAll(`.filter-item.active[data-taxonomy="${taxonomy}"]`)
                .forEach(el => el.classList.remove('active'));

            filterItem.classList.add('active');
        }

        applyFilters();
    });

    // apply / reset
    filtersWrapper.addEventListener('click', (e) => {

        if (e.target.matches('#cwc-apply-filters')) {
            applyFilters();
        }

        if (e.target.matches('#cwc-reset-filters')) {
            filtersWrapper.querySelectorAll('.filter-item.active')
                .forEach(el => el.classList.remove('active'));

            applyFilters();
        }

    });

});