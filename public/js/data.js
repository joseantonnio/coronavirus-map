!function(e){var r={};function o(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=e,o.c=r,o.d=function(e,r,t){o.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,r){if(1&r&&(e=o(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(o.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)o.d(t,n,function(r){return e[r]}.bind(null,n));return t},o.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(r,"a",r),r},o.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},o.p="/",o(o.s=37)}({37:function(e,r,o){e.exports=o(38)},38:function(e,r){var o={labels:["26/02/20","27/02/20","28/02/20","29/02/20","01/03/20","02/03/20","03/03/20","04/03/20","05/03/20","06/03/20","07/03/20","08/03/20","09/03/20","10/03/20","11/03/20","12/03/20","13/03/20","14/03/20","15/03/20","16/03/20","17/03/20"],cases:[1,1,1,2,2,2,2,3,8,13,19,25,30,34,52,77,107,121,200,234,291],serious:[0,0,0,1,2,2,2,3,3,3,3,3,3,3,3,3,5,5,5,5,7],recovered:[1,1,1,2,2,2,2,3,3,3,3,3,3,3,3,3,3,3,6,6,6],deaths:[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,3,4]},t={maintainAspectRatio:!1},n=document.getElementById("brazilChart").getContext("2d"),a=(new Chart(n,{type:"line",data:{labels:o.labels,datasets:[{label:"Casos",lineTension:0,data:o.cases,backgroundColor:"rgba(241, 196, 15, 0.8)",borderWidth:1},{label:"Casos Graves",lineTension:0,data:o.serious,backgroundColor:"rgba(230, 126, 34, 0.8)",borderWidth:1},{label:"Recuperados",lineTension:0,data:o.recovered,backgroundColor:"rgba(39, 174, 96, 0.8)",borderWidth:1},{label:"Mortes",data:o.deaths,lineTension:0,backgroundColor:"rgba(192, 57, 43, 0.8)",borderWidth:1}]},options:t}),document.getElementById("stateChart").getContext("2d")),l=(new Chart(a,{type:"line",data:{labels:o.labels,datasets:[{label:"Casos",lineTension:0,backgroundColor:"rgba(241, 196, 15, 0.8)",borderWidth:1},{label:"Casos Graves",lineTension:0,backgroundColor:"rgba(230, 126, 34, 0.8)",borderWidth:1},{label:"Recuperados",lineTension:0,backgroundColor:"rgba(39, 174, 96, 0.8)",borderWidth:1},{label:"Mortes",lineTension:0,backgroundColor:"rgba(192, 57, 43, 0.8)",borderWidth:1}]},options:t}),document.getElementById("cityChart").getContext("2d"));new Chart(l,{type:"line",data:{labels:o.labels,datasets:[{label:"Casos",lineTension:0,backgroundColor:"rgba(241, 196, 15, 0.8)",borderWidth:1},{label:"Casos Graves",lineTension:0,backgroundColor:"rgba(230, 126, 34, 0.8)",borderWidth:1},{label:"Recuperados",lineTension:0,backgroundColor:"rgba(39, 174, 96, 0.8)",borderWidth:1},{label:"Mortes",lineTension:0,backgroundColor:"rgba(192, 57, 43, 0.8)",borderWidth:1}]},options:t})}});