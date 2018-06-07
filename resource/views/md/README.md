## donghaichen

> A

```php
    //二分查找（数组里查找某个元素）  
    function bin_sch($array,  $low, $high, $k){   
        if ( $low <= $high){   
            $mid =  intval(($low+$high)/2 );   
            if ($array[$mid] ==  $k){   
                return $mid;   
            }elseif ( $k < $array[$mid]){   
                return  bin_sch($array, $low,  $mid-1, $k);   
            }else{   
                return  bin_sch($array, $mid+ 1, $high, $k);   
            }   
        }   
        return -1;   
    }   
```
```javascript
    function bubbleSort(arr) {
        var len = arr.length;
        for (var i = 0; i < len; i++) {
            for (var j = 0; j < len - 1 - i; j++) {
                if (arr[j] > arr[j+1]) {        //相邻元素两两对比
                    var temp = arr[j+1];        //元素交换
                    arr[j+1] = arr[j];
                    arr[j] = temp;
                }
            }
        }
        return arr;
    }
```
 :heart: