document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab-menu .month');
    const items = document.querySelectorAll('.list-link-cards li');

    function filterItems(targetMonth) {
        items.forEach(item => {
            if (item.getAttribute('data-month') === targetMonth) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            // アクティブ切り替え
            tabs.forEach(t => t.classList.remove('tab-active'));
            this.classList.add('tab-active');

            // 選択された月
            const targetMonth = this.getAttribute('data-month');
            filterItems(targetMonth);
        });
    });

    // === 初期表示用 ===
    const activeTab = document.querySelector('.tab-menu .month.tab-active');
    if (activeTab) {
        const targetMonth = activeTab.getAttribute('data-month');
        filterItems(targetMonth);
    }
});
