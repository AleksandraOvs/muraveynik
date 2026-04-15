var $button = $('#loadmore');

let currentPage = 1;
let maxPages = 1;
let loading = false;

// ============================
// SYNC FUNCTION
// ============================
function syncPagination() {
    const container = document.querySelector('.products');
    if (!container) return;

    currentPage = 1;
    maxPages = parseInt(container.dataset.maxPages || 1);
}

// ============================
// LOAD MORE CORE FUNCTION
// ============================
async function loadMoreProducts() {

    if (loading) return;
    if (currentPage >= maxPages) return;

    loading = true;
    currentPage++;

    const formData = new URLSearchParams();
    formData.append('action', 'load_more_products');
    formData.append('page', currentPage);

    // 🔥 ФИЛЬТРЫ
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
        const container = document.querySelector('.products');
        container.insertAdjacentHTML('beforeend', html);

        document.dispatchEvent(new Event('productsLoaded'));
    }

    loading = false;
}

// ============================
// BUTTON LOAD MORE
// ============================
$button.on('click', function (e) {
    e.preventDefault();

    loadMoreProducts();
});

// ============================
// SCROLL LOAD MORE
// ============================
window.addEventListener('scroll', () => {

    if (loading) return;
    if (currentPage >= maxPages) return;

    const scroll = window.scrollY + window.innerHeight;
    const trigger = document.body.offsetHeight - 300;

    if (scroll < trigger) return;

    loadMoreProducts();
});

// ============================
// FILTER SYNC EVENT
// ============================
document.addEventListener('cwc_filters_applied', () => {
    syncPagination();
});