const ser=document.querySelector('#send')
ser.addEventListener('click', function(ev){
    ev.preventDefault()
    // console.log("działa")
    const priority=document.querySelector('input[name="priority"]:checked')
    const surname=document.querySelector('#surname')
    const firm=document.querySelector('#firm')
    const problem=document.querySelector('#problem')
    if(surname!==null){
        console.log(surname.value)
        if(firm!==null) {
            console.log(firm.value)
            if(problem!==null){
                console.log(problem.value)
                if(priority!==null){
                    console.log(priority.value)
    }} }}
    else{
        alert("popraw dane")
    }
})