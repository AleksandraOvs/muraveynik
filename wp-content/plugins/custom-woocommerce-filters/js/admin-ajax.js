document.addEventListener('DOMContentLoaded', () => {

    const filtersWrapper = document.querySelector('.sidebar-area-wrapper._filters');
    const productsWrapper = document.querySelector('.products');

    if (!filtersWrapper || !productsWrapper) return;

    function getFiltersData() {
        const data = {
            action: 'cwc_filter_products',
            current_cat_id: filtersWrapper.dataset.currentCat || 0
        };

        // текстовые фильтры: берём только последнее активное значение для каждого атрибута
        const activeFilters = {};
        filtersWrapper.querySelectorAll('.filter-item.active').forEach(el => {
            const taxonomy = el.closest('[data-taxonomy]')?.dataset.taxonomy;
            const slug = el.dataset.slug;
            if (taxonomy && slug) {
                // записываем только последнее значение
                activeFilters[taxonomy] = slug;
            }
        });

        // добавляем в data
        for (const [taxonomy, slug] of Object.entries(activeFilters)) {
            data['filter_' + taxonomy] = slug;
        }

        // в наличии
        if (filtersWrapper.querySelector('.instock-filter.active')) {
            data.instock = 1;
        }

        console.log('Filters data for AJAX:', data); // отладка

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
                console.log('Server debug info:', res); // отладка ответа
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

    // клики по фильтрам
    filtersWrapper.addEventListener('click', (e) => {
        const filterItem = e.target.closest('.filter-item');
        if (!filterItem) return;

        e.preventDefault();
        filterItem.classList.toggle('active');

        // отключаем множественный выбор для одного атрибута
        const taxonomy = filterItem.closest('[data-taxonomy]')?.dataset.taxonomy;
        if (taxonomy && filterItem.classList.contains('active')) {
            filtersWrapper.querySelectorAll(`.filter-item.active`).forEach(el => {
                if (el !== filterItem && el.closest('[data-taxonomy]')?.dataset.taxonomy === taxonomy) {
                    el.classList.remove('active');
                }
            });
        }

        applyFilters();
    });

    // кнопки "Применить" и "Сбросить"
    filtersWrapper.addEventListener('click', (e) => {
        if (e.target.matches('#cwc-apply-filters')) {
            applyFilters();
        }
        if (e.target.matches('#cwc-reset-filters')) {
            filtersWrapper.querySelectorAll('.filter-item').forEach(el => el.classList.remove('active'));
            applyFilters();
        }
    });

});