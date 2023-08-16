<!-- Modal -->
<div class="modal animated zoomIn" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Event Management</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="eventShow" class="modal-body p-3">
                    <div class="container-fluid">
                        <br/>
                        <div class="row">
                            <div class="col-128">
                               
                                <h1 class="text-center text-bold" id="title"></h1>                                
                                <hr class="mx-0 my-2 p-0 bg-secondary"/>                    
                                <p class="text-xs mx-0 my-1"> <span id="description"></span> </p>                              
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold text-xs my-1 text-dark"> Location:  <span id="location"></span></p>
                                <p class="text-bold text-xs my-2 text-dark"> Date:  <span id="date"></span></p>
                                <p class="text-bold text-xs my-1 text-dark"> Time:  <span id="time"></span></p>                            
                            </div>

                        </div>
                     
                      
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
                <button onclick="PrintPage()" class="btn bg-gradient-success">Print</button>
            </div>
        </div>
    </div>
</div>

<script>

        async function evenDetails(id){

            //document.getElementById('eventIddd').value=id

             let res=await axios.get("/event-show", {params: { id: id }})
             let event=res.data
             document.getElementById('title').innerText=event.title
             document.getElementById('description').innerText=event.description
             document.getElementById('location').innerText=event.location
             document.getElementById('date').innerText=event.date
             document.getElementById('time').innerText=event.time
        }

</script>