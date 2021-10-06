function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-'+ id).submit();
        }
    })

}

function publicIp(){
    const ipAPI = '//api.ipify.org?format=json'

    Swal.queue([{
        title: 'Your public IP',
        confirmButtonText: 'Show my public IP',
        text:
            'Your public IP will be received ',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(ipAPI)
                .then(response => response.json())
                .then(data => Swal.insertQueueStep(data.ip))
                .catch(() => {
                    Swal.insertQueueStep({
                        icon: 'error',
                        title: 'Unable to get your public IP'
                    })
                })
        }
    }])
}
