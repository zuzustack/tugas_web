let init = () => {
    // Init Data
    let data = $('pagination').data();
    console.log(data);
    let innerHtml = "";
    let number = "";
    let totalPage = Math.ceil(data.totalpage / data.maxitem)

    // check currentPage same with 1
    if (data.currentpage != 1) {
        innerHtml += `
            <div class="prev">
                <a href="/?users&page=${data.currentpage - 1}">Prev</a>
            </div>
        `
    }

    // Render Number Page
    for (let i = 1; i <= totalPage; i++) {
        if (i == data.currentpage) {
            number += `
            <div class="number active">
                <a href="">${i}</a>
            </div>
            `    
        } else {
            number += `
            <div class="number">
                <a href="/?users&page=${i}">${i}</a>
            </div>
            `
        }
    }
    innerHtml += number;


    // check currentPage same with lastPage
    if (data.currentpage != totalPage) {
        innerHtml += `
        <div class="next">
            <a href="/?users&page=${data.currentpage + 1}">Next</a>
        </div>
        `
    }


    // init
    $('pagination').html(innerHtml);

}
init();