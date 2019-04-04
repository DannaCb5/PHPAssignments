function pyramidBuilder () {
    let pyramid = '0';
    for (let i=0; i< MimeTypeArray.length; i ++) {
        let tempString = pyramid;
        tempString += myArray[i];
        pyramid += tempString + 'n';

    }
    return pyramid;
}

console.log pyramidBuilder();
