import './style.css';
import { Box, Button, TextField } from '@mui/material';
import React from 'react';
import ReactDOM from 'react-dom/client';
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import axios from 'axios';

const root = ReactDOM.createRoot(document.getElementById('root'));

const handleFormSubmit = (evt) => {
  evt.preventDefault();

  axios
    .post('/auth/check', {
      login: evt.target.login.value,
      password: evt.target.password.value,
    })
    .then(({ data }) => {
      window.location.href = data.route;
    })
    .catch(({ response }) => toast.error(response.data.error));
};

root.render(
  <React.StrictMode>
    <ToastContainer />
    <Box
      component="form"
      sx={{
        display: 'flex',
        flexDirection: 'column',
        gap: 2,
        padding: "32px 24px",
        backgroundColor: 'white',
        borderRadius: 1,
        marginTop: 2,
        width: 400
      }}
      onSubmit={handleFormSubmit}
    >
      <TextField
        fullWidth
        name="login"
        label="Логин"
        type="text"
        required
      />
      <TextField
        fullWidth
        name="password"
        label="Пароль"
        type="password"
        required
      />

      <Button
        variant="contained"
        size="large"
        type="submit"
      >
        Войти
      </Button>
    </Box>
  </React.StrictMode>
);
