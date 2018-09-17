<script>
$(".services-list-overlay").hide();
function listServices() {
    // Check if value is not empty else hide overlay
    if($("#searchForm").val() !== '') {
        $(".services-list-overlay").fadeIn(200);
        document.querySelector('.services-list-overlay').style.display = 'block';
        document.querySelector(".services-list-overlay").innerHTML ="<center>Fetching Results....";
        if(navigator.onLine) {
            setTimeout(() => {
                let valSearch = document.querySelector("#searchForm").value;
                fetch(`/lists/services/${valSearch}`)
                .then(res => res.json())
                .then(results => {
                    // console.log(results);
                    if(results.length !== 0) {
                        let htmll = "";
                        for(const result of results){
                            // console.log(result.title);
                            htmll += `<a href="{{ url('${result.link}') }}" target="_blank">${result.title}</a>`;
                            setTimeout(() => {
                                $(".services-list-overlay").html(htmll);
                            }, 1000);
                        }
                    }else {
                        $(".services-list-overlay").html('<center><span style="color: red">No Results Found</span></center>');
                    }
                    
                })
                .catch(err => {
                    $(".services-list-overlay").html('<center><span style="color: red;">Something bad went wrong, Try Again Later.</span></center>');
                });
            }, 2000);
        }else {
            $(".services-list-overlay").html('<center><span style="color: red;">Oops! Seems you are disconnected.</span></center>');
        }
    }else {
        $(".services-list-overlay").fadeOut(200);
    }
    // console.log(value);
};
// Fetching Services Ends