import { createSlice } from '@reduxjs/toolkit'


export const crudSlice = createSlice({
  name: 'crud',
  initialState: {
    form: null,
    table: null,
    deleteModal: {
      formData: null,
      endpoint: null,
      show: false
    }
  },
  reducers: {
    updateForm: (state, action) => {
      state.form = action.payload
    },
    updateTable: (state, action) => {
      state.table = action.payload
    },
    showDeleteModal: (state, action) => {
      state.deleteModal = action.payload
    },
    hideDeleteModal: (state) => {
      state.deleteModal = {
        formData: null,
        endpoint: null,
        show: false
      }
    }
  }
})

export const {
  updateForm,
  updateTable,
  showDeleteModal,
  hideDeleteModal
} = crudSlice.actions

export default crudSlice.reducer