export default{
    watch:{
        keyword(){
            let keys = ['title','content','email'];
            if(this.keyword.length){
                this.Searchnotes = this.notes.filter((item) => {
                    //let keys = Object.keys(item);
                    return keys.some((key) => {
                        let keyValue = String(item[key]);
                        return keyValue.toLowerCase().indexOf(this.keyword.toLowerCase()) > -1;
                    })
                });
            }else{
                this.Searchnotes = this.notes;
            }
            /*if (this.keyword.length > 0) {
                this.Searchnotes = this.notes.filter((item) => {
                    return Object.keys(item).some((key)=>{
                        let string = String(item[key]) 
                        return string.toLowerCase().indexOf(this.keyword.toLowerCase())>-1
                            // console.log(string)
                        })
                });
                    // console.log(result)
                }else{
                    this.Searchnotes = this.notes
                }*/
            }
        }   
    }










