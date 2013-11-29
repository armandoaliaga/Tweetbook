function showDelete(elemId)
    {
        elem=document.getElementById(elemId);
        elem.style.visibility="visible";
    }
    function hideDelete(elemId)
    {
        elem=document.getElementById(elemId);
        elem.style.visibility="hidden";
    }
    function deleteImage(imgId)
    {
        if(confirm("Esta seguro(a) que desea eliminar esta foto?"))
        {
            document.getElementsByName("delete"+imgId)[0].submit();
        }
    }

