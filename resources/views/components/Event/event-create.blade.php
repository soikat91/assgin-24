<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
       
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                </div>
                <div class="modal-body">
                    <form id="insertData">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" id="title">
                                
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Description *</label>
                                    <input type="text" class="form-control" id="description">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">time *</label>
                                    <input type="text" class="form-control" id="time">
                                </div>

                                <div class="col-12 p-1">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="date">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="location">
                                </div>
                            </div>
                        
                         </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="model-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="insertEven()" type="submit" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        
    </div>
</div>

<script>

    async function insertEven(){ 


            let title=document.getElementById("title").value;
            let description=document.getElementById("description").value;
            let time=document.getElementById("time").value;
            let date=document.getElementById("date").value;
            let location=document.getElementById("location").value;
         
            if(title.length===0){
                errorToast("Title Required")
            }else if(description.length===0){
                errorToast("Description Required")
            }else if(time.length===0){
                errorToast("Date Required")
            }else if(date.length===0){
                errorToast("Time Required")
            }else if(location.length===0){
                errorToast("Location Required")
            }else{

              //  $('#model-close').modal('hide') //jquery use
               document.getElementById('model-close').click()
                showLoader();
                let res=await axios.post('/event-create',{
                    title:title,                    
                    description:description,
                    time:time,
                    date:date,
                    location:location,
                })
                hideLoader();
                if(res.status==201){
                   
                    successToast('Created Success')
                    $('#insertData').trigger("reset")
                    await EventList()
                }else{
                    errorToast('Request Failed')
                }

            }
        }

</script>




