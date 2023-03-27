import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { APIRoute, dataGridLocalText } from '../../../const';
import { Box, Button, Checkbox, Grid, TextField } from '@mui/material';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';

function TagsDataGrid() {
  const [rows, setRows] = useState([]);

  const handleDeleteButtonClick = (id, title) => () => {
    const isConfirmed = window.confirm(
      `Вы уверены что хотите безвозвратно удалить тег ${title}?`
    );

    isConfirmed && axios.post(APIRoute.TAGS, { id })
      .then(({ data }) => {
        toast.success(data.message);
        setRows([...rows.filter((row) => row.id !== id)]);
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios.post(APIRoute.TAGS_STORE, {
      title: evt.target.title.value,
    })
      .then(({ data }) => {
        toast.success(data.message);
        setRows([data.tag, ...rows])
        evt.target.reset();
      })
      .catch((error) => console.log(error));
  };

  const handleProcessRowUpdate = (newRow) => {
    axios.post(APIRoute.TAGS_UPDATE, newRow)
      .then(({ data }) => toast.success(data.message))
      .catch((error) => console.log(error));

    return newRow;
  }

  const handleCheckboxClick = (tag) => () => {
    tag.shown = !tag.shown;
    axios.post(APIRoute.TAGS_UPDATE, tag)
      .then(({ data }) => toast.success(data.message))
      .catch((error) => console.log(error));
  };

  const columns = [
    {
      field: 'id',
      headerName: 'ID',
      align: 'center',
      headerAlign: 'center',
      width: 50,
    },
    {
      field: 'title',
      headerName: 'Название',
      width: 300,
      editable: true,
    },
    {
      field: 'shown',
      headerName: 'Показать',
      width: 100,
      align: 'center',
      headerAlign: 'center',
      renderCell: (params) => (
        <Checkbox
          onClick={handleCheckboxClick(params.row)}
          defaultChecked={params.row.shown ? true : false}
        />
      ),
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 120,
      align: 'right',
      headerAlign: 'center',
      renderCell: (params) => (
        <Stack spacing={1} direction="row" alignItems="center">
          <Button
            variant="contained"
            color="error"
            size="small"
            onClick={handleDeleteButtonClick(params.row.id, params.row.title)}
          >
            Удалить
          </Button>
        </Stack>
      ),
    },
  ];

  useEffect(() => {
    axios.get(APIRoute.TAGS)
      .then(({ data }) => {
        setRows(data.map(({ id, title, shown }) => ({ id, title, shown })));
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  return (
    <Grid container spacing={2} marginTop={0}>
      <Grid item xs={6}>
        <Box
          component="form"
          sx={{
            padding: 2,
            backgroundColor: 'white',
            borderRadius: 1,
            display: 'flex',
            gap: 1,
            marginBottom: 1,
          }}
          onSubmit={handleFormSubmit}
        >
          <TextField
            fullWidth
            name="title"
            type="text"
            label="Название"
            placeholder="Введите название категории"
            required
            size="small"
          />

          <Button
            type="submit"
            color="success"
            variant="contained"
            sx={{ width: '160px' }}
          >
            Добавить
          </Button>
        </Box>

        <DataGrid
          sx={{ backgroundColor: 'white', height: 631 }}
          rows={rows}
          columns={columns}
          pageSize={10}
          rowsPerPageOptions={[10]}
          disableSelectionOnClick
          experimentalFeatures={{ newEditingApi: true }}
          localeText={dataGridLocalText}
          processRowUpdate={handleProcessRowUpdate}
        />
      </Grid>
    </Grid>
  );
}

export default TagsDataGrid;
