<template>
  <div>
    <div class="container">
      <div class="todo">
        <div class="todo-header">
          <label for="">
            <p>Enter you task to be done</p>
            <input
              type="text"
              @keypress.enter="addItem"
              v-model="todoItem"
              name="todo"
            />
          </label>
        </div>
        <div class="todo-body">
          <ul>
            <li v-for="(item, index) in todoList" :key="index">
              <span>{{ item.id }}</span>
              <input type="checkbox" />
              <span>{{ item.task }}</span>
              <span>{{ item.date }}</span>
              <button @click="removeItem(item.id,item)">x</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      todoList: [],
      todoItem: "",
    };
  },
  methods: {
    allRecords() {
      axios
        .post("https://staging.hostmd.biz/todo-backend/postdata.php", {
          request: 3,
        })
        .then((response) => (this.todoList = response.data))
        .catch(function (error) {
          console.log(error);
        });
    },
    addItem() {
      if (this.todoItem === "") {
        return;
      }
      if (this.todoItem != "") {
        axios.post("https://staging.hostmd.biz/todo-backend/postdata.php", {
          request: 1,
          todo: this.todoItem,
        });
        this.todoList.push(this.todoItem);
        this.todoItem = "";
      }
    },
    removeItem(id,elm) {
    //   this.todoList.splice(this.todoList.indexOf(elm), 1);
      axios
        .post("https://staging.hostmd.biz/todo-backend/postdata.php", {
          request: 2,
          id: id,
        })
        .then(() => {
        
          this.todoList.splice(this.todoList.indexOf(elm), 1);
        //   console.log(response.data);
        });
    },
  },
//   created() {
//     this.allRecords();
//   },
//   updated(){
//      this.allRecords(); 
//   }
};
</script>

<style>
.container {
  width: 100%;
  max-width: 900px;
  margin: 0 auto;
}
.todo-header label {
  width: 100%;
}
.todo-header input {
  width: 100%;
  max-width: 500px;
  margin: 15px auto;
  height: 40px;
  border-radius: 8px;
  border: 1px solid #000;
  outline: none;
  padding: 0 15px;
  font-size: 16px;
}
.todo-body {
  width: 600px;
  margin: 20px auto;
}
.todo-body ul {
  padding: 0;
  margin: 0;
}
.todo-body ul li {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 10px;
  border-bottom: 1px solid #000;
}
.todo-body ul li input[type="checkbox"] {
  margin: 0 10px 0 0;
  width: 20px;
  height: 20px;
  cursor: pointer;
}
.todo-body ul li button {
  width: 30px;
  height: 30px;
  border-radius: 8px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #000;
  margin: auto 0 auto auto;
}
</style>