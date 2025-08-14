document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab-menu .month');
    const items = document.querySelectorAll('.list-link-cards li');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            // アクティブ切り替え
            tabs.forEach(t => t.classList.remove('tab-active'));
            this.classList.add('tab-active');

            // 選択された月 (例: 2025-08)
            const targetMonth = this.getAttribute('data-month');

            // 投稿の表示切り替え
            items.forEach(item => {
                if (item.getAttribute('data-month') === targetMonth) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
