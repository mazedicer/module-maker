$(document).ready(function () {
    /* url for api requests. needs handyman.js */
    var url=Handyman.getTheURL()+'/api/example.php';
    
    /*example api request */
    function returnData(){
        var data={update:'update'};
        fetchData(data)
        .then(function(data){
            handleFetchResponse(data,'updatedb');
        });
    }
    
    async function fetchData(data){
        /* API calls to api/example.php */
        const response=await fetch(url,{
                    method:'POST', // or 'PUT'
                    body:JSON.stringify(data), 
                    headers:new Headers({
                      'Content-Type': 'application/json'
                    })
                  });
        const text=await response.text();
        return text;
    }
    function handleFetchResponse(text,fetch_type){
        switch(fetch_type){
            case 'excel':
                //code
                break;
            case 'updatedb':
                //code
                break;
        }
    }
});