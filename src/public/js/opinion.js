// マウスオーバー時に全文を表示する関数
    function showFullOpinion(event) {
        const element = event.target;
        const opinion = element.getAttribute('data-opinion');
        element.textContent = opinion;
    }

    // マウスアウト時に省略表示に戻す関数
    function showTruncatedOpinion(event) {
        const element = event.target;
        const opinion = element.getAttribute('data-opinion');
        const truncatedOpinion = opinion.slice(0, 25) + '...';
        element.textContent = truncatedOpinion;
    }

    // マウスオーバーとマウスアウトのイベントリスナーを設定
    const trunactedElements = document.querySelectorAll('.truncated');
    trunactedElements.forEach(element => {
        element.addEventListener('mouseover', showFullOpinion);
        element.addEventListener('mouseout', showTruncatedOpinion);
    });