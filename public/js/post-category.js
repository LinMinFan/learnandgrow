$(document).ready(function() {
    // 監聽 select 元素的變動事件
    $('#categorySelect').on('change', function() {
        // 取得選取的值
        let selectedSlug = $(this).val();
        let dataUrl = $(this).data('url');

        // 如果選擇的值不是預設的值
        if (selectedSlug !== '0') {
            // 構建目標 URL
            let targetURL = dataUrl + '/' + selectedSlug;

            // 重新導向到目標 URL
            window.location.href = targetURL;
        }
    });
});