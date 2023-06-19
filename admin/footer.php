</div>
<script>
    let checkbox =document.querySelectorAll('[type="checkbox"]');
    let selectAll =document.getElementById("selectAll");
    let unSelectAll =document.querySelector("#unselectAll");
    let delAll =document.querySelector("#delAll");
    selectAll.addEventListener("click",function(){
        checkbox.forEach(e=>{
            e.checked = true
        })
    })
    unSelectAll.addEventListener("click",function(){
        checkbox.forEach(e=>{
            e.checked =false 
        })
    })

    let reset =document.querySelector('[type="reset"]');
    let inputs =document.querySelectorAll("input");
    console.log(reset);console.log(inputs)
    reset.addEventListener("click",function(){
        inputs.values ="";
    })
</script>
</body>
</html>