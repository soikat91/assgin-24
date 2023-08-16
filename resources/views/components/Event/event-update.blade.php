
<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
       
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
                </div>
                <div class="modal-body">
                    <form id="updateData">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" id="titleUpdate">
                                    <input type="text" class="form-control" id="eventID">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Description *</label>
                                    <input type="text" class="form-control" id="descriptionUpdate">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">time *</label>
                                    <input type="text" class="form-control" id="timeUpdate">
                                </div>

                                <div class="col-12 p-1">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="dateUpdate">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="locationUpdate">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update-model-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="eventUpdate()" type="submit" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
      
    </div>
</div>

<script>



        async function eventID(id){
            document.getElementById('eventID').value=id
            showLoader()
            let res=await axios.post('/event-by-id',{id:id});
            hideLoader()
            document.getElementById('titleUpdate').value=res.data['title']
            document.getElementById('descriptionUpdate').value=res.data['description']
            document.getElementById('timeUpdate').value=res.data['time']
            document.getElementById('dateUpdate').value=res.data['date']
            document.getElementById('locationUpdate').value=res.data['location']


        }


        async function eventUpdate(){

            var titleUpdate=document.getElementById('titleUpdate').value
            var descriptionUpdate=document.getElementById('descriptionUpdate').value
            var timeUpdate=document.getElementById('timeUpdate').value
            var dateUpdate=document.getElementById('dateUpdate').value
            var locationUpdate=document.getElementById('locationUpdate').value
            var eventID=document.getElementById('eventID').value

            if(titleUpdate.length===0){
                errorToast("Title Required")
            }else if(descriptionUpdate.length===0){
                errorToast("Description Required")
            }else if(dateUpdate.length===0){
                errorToast("Date Required")
            }else if(timeUpdate.length===0){
                errorToast("Time Required")
            }else if(locationUpdate.length===0){
                errorToast("Location Required")
            }else{
                
              //  document.getElementById('update-modal-close').click();
                showLoader()
                let res=await axios.post('/event-update',{
                    title:titleUpdate,
                    description:descriptionUpdate,
                    time:timeUpdate,
                    date:dateUpdate,
                    location:locationUpdate,
                    id:eventID 
                })
                hideLoader();

                if(res.data===1){
                   
                    $('#update-modal').trigger("reset")
                    successToast('Update Success')
                   
                    await EventList()
                }else{
                    errorToast("Request Failed")
                }
            }

            

            
        }


    // async function getExpenseId(id) {

    //     document.getElementById('incomeID').value=id;      

    // //    showLoader()
    //    let res=await axios.post('/expense-by-id',{id:id})
    //    document.getElementById('categoryUpdate').value=res.data['category']
    //    document.getElementById('amountUpdate').value=res.data['amount']
    //    document.getElementById('descriptionUpdate').value=res.data['description']
    //    document.getElementById('dateUpdate').value=res.data['date']
    //     hideLoader()
        
    // }

    // $('#updateData').on('submit',async function(e){
    //     e.preventDefault();       
    //     let categoryUpdate=document.getElementById('categoryUpdate').value
    //     let amountUpdate=document.getElementById('amountUpdate').value
    //     let descriptionUpdate=document.getElementById('descriptionUpdate').value
    //     let dateUpdate=document.getElementById('dateUpdate').value
    //     let incomeID=document.getElementById('incomeID').value
        
    //     if(categoryUpdate.length===0){
    //         errorToast('Category Required')

    //     }else if(amountUpdate.length===0){

    //         errorToast('Amount Required')
    //     }else if(descriptionUpdate.length===0){

    //         errorToast('Description Required')             
    //     }else{
    //         $('#update-modal').modal('hide')
    //         showLoader()
    //         let res=await axios.post('/expense-update',{
    //             id:incomeID,
    //             category:categoryUpdate,
    //             amount:amountUpdate,
    //             description:descriptionUpdate,
    //             date:dateUpdate,
    //         })
    //         hideLoader()

    //         if(res.status===200 && res.data===1){
                
    //             successToast('Updated Success')
    //             $('#update-modal').trigger("reset")
    //             await ExpenseList()
                
    //         }else{

    //             errorToast("Request Failed")    
    //         }
    //     }   
       

    //   })
  
</script>
