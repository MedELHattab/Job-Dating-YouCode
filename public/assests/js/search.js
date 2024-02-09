$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 
 
$(document).ready(function () {
   
    $("#search").on('input', function(e) {
        e.preventDefault();

       
        var search_string = $(this).val().trim();

       
        $.ajax({
            type: "GET",
            url: "/search", 
            data: {search_string: search_string},
            dataType: "json",
            success: function (response) {
                 
                $("#place").html("")
                console.log(response)
                    appenRespose(response);
             
            
            },
            error: function (error) {
                $("#place").html(`
                        <div class=" felx justify-center  " >
                            <p class=" text-center text-2xl text-red-700 p-10 " >
                                no result found  for  !! <b> ${search_string} </b> 
                            </p>
                        </div>
                `)
              
               
               
            }
        });
    });
});

function appenRespose(data){
    data.forEach(r => {
      
               
           
                  $("#place").append(

                          `
                          <a href="{{ route('announcements.show', $announcement) }}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="
                            background-image: url('{{ asset('uploads/announcements/'. $announcement->image) }}');
                            background-size: cover; 
                            background-position: center center;
                            background-repeat: no-repeat;
                        ">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                    
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">${r.title}</h2>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">${r.company.name }}</h2>
                                
                               
                                
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                ${r.description }
                                </p>
                            </div>
                    
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                          `

                  );
         
           
              });  
}
