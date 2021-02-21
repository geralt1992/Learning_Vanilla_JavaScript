//ovo je export objekta
export default {
    search : function(searchTerm, searchLimit, sortBy){

        return fetch(`http://www.reddit.com/search.json?q=${searchTerm}&sort=${sortBy}&limit=${searchLimit}`)
            .then( res => res.json())
            //vraća samo data iz cijelog objekta
            .then( data => data.data.children.map( data =>
                    data.data))
            .catch( e => console.log(e));
    }
};


