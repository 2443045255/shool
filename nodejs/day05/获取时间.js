const date = new Date()

const year = date.getFullYear()
const month = date.getMonth()
const day = date.getDate()

function getTime() {
  return `${year}年${month}月${day}日`
}


module.exports = {
  getTime
}
