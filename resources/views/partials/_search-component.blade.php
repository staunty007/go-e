<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
$(".services-list-overlay").hide();

const listServices = () => {
    // Check if value is not empty else hide overlay
    if($("#searchForm").val() !== '') {
        $(".services-list-overlay").fadeIn(200);
        document.querySelector('.services-list-overlay').style.display = 'block';
        document.querySelector(".services-list-overlay").innerHTML ="<center>Fetching Results....";
        if(navigator.onLine) {
            setTimeout(() => {
                let keyword = document.querySelector("#searchForm").value;
                $.ajax({
                    url: '/lists/services',
                    method: 'POST',
                    data: keyword,
                    success: (response) => {
                        if(response.length !== 0) {
                            let htmll = "";
                            for(const result of response){
                                // console.log(result.title);
                                htmll += `<a href="{{ url('${result.link}') }}" target="_blank">${result.title}</a>`;
                                setTimeout(() => {
                                    $(".services-list-overlay").html(htmll);
                                }, 1000);
                            }
                        }else {
                            $(".services-list-overlay").html('<center><span style="color: red">No Results Found</span></center>');
                        }
                    },
                    error: (err) => {
                        $(".services-list-overlay").html('<center><span style="color: red;">Something bad went wrong, Try Again Later.</span></center>');
                    }
                })
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
</script>

<script>
    document.body.appendChild(`
        <div style="display:flex; width: 100%; height: 20px; background-color: #C0C2C7">
            <a class='btn btn-success' href='home'>My Profile</a>
        </div>
    `);
</script>