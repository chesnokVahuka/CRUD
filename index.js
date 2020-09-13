// document.addEventListener("DOMContentLoaded", () => {
  
    
// });
function auth(event){
    event.preventDefault();
    let login = document.querySelector('#login').value;
    let pass = document.querySelector('#password').value;  
    if((login.length == 0) || (pass.length == 0))
    {
        alert('miss required parameter')
    }
    // axios.post('handler.php', {
    //     login: login,
    //     pass: pass
    //   })
    //   .then(function (response) {
    //     console.log(response);
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });

    axios.get('handler.php?login='+login+'&pass='+pass)
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  
}

