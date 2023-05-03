let init = () => {
    // Init Data
    let url = "/" + $('pagination')[0].baseURI.split("/")[3].split("&")[0];
    let data = $('pagination').data();
    let innerHtml = "";
    let number = "";
    let totalPage = Math.ceil(data.totalpage / data.maxitem)

    console.log(url);


    // check currentPage same with 1
    if (data.currentpage != 1) {
        innerHtml += `
            <div class="prev">
                <a href="${url}&page=${data.currentpage - 1}">Prev</a>
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
                <a href="${url}&page=${i}">${i}</a>
            </div>
            `
        }
    }
    innerHtml += number;


    // check currentPage same with lastPage
    if (data.currentpage != totalPage) {
        innerHtml += `
        <div class="next">
            <a href="${url}&page=${data.currentpage + 1}">Next</a>
        </div>
        `
    }


    // init
    $('pagination').html(innerHtml);

}
init();