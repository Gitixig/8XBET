input.addEventListener('keyup', function (e) {
    let keyword = input.value.trim();

    if (e.key === 'Enter') {
        // Nếu nhấn Enter, điều hướng đến trang tìm kiếm đầy đủ
        window.location.href = '/index.php?controller=sanpham&action=timkiem&keyword=' + encodeURIComponent(keyword);
        return;
    }

    if (keyword.length > 0) {
        // Gửi yêu cầu AJAX đến server để lấy gợi ý
        fetch('/ajax/suggest.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'keyword=' + encodeURIComponent(keyword)
        })
            .then(res => res.text())
            .then(data => {
                suggestions.innerHTML = data;
            });
    } else {
        suggestions.innerHTML = '';
    }
});
