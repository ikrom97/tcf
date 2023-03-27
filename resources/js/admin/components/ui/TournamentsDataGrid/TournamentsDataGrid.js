import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { AdminRoute, APIRoute, dataGridLocalText } from '../../../const';
import { removeTags } from '../../../util';
import parse from 'html-react-parser';
import { Button } from '@mui/material';
import { generatePath } from 'react-router-dom';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';

function TournamentsDataGrid() {
  const [rows, setRows] = useState([]);
  const [selection, setSelection] = useState([]);

  const handleDeleteSelectedButtonClick = () => {
    const isConfirmed = window.confirm(
      `Вы уверены что хотите безвозвратно удалить выбранные препараты? \nВыбрано ${selection.length}`
    );

    isConfirmed && axios.post(APIRoute.TOURNAMENTS_DELETE, { IDs: selection })
      .then(({ data }) => {
        toast.success(data.message);
        setRows([...rows.filter((row) => !selection.includes(row.id))]);
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  const handleDeleteButtonClick = (id, title) => () => {
    const isConfirmed = window.confirm(
      `Вы уверены что хотите безвозвратно удалить ${title}?`
    );

    isConfirmed &&
      axios.post(APIRoute.TOURNAMENTS_DELETE, { IDs: [id] })
        .then(({ data }) => {
          toast.success(data.message);
          setRows([...rows.filter((row) => row.id !== id)]);
        })
        .catch(({ response }) => toast.error(response.data.message));
  };

  const columns = [
    { field: 'id', headerName: 'ID', width: 50 },
    {
      field: 'title',
      headerName: 'Название',
      width: 272,
    },
    {
      field: 'date',
      headerName: 'Дата',
      width: 160,
    },
    {
      field: 'content',
      headerName: 'Контент',
      width: 400,
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 250,
      renderCell: (params) => (
        <Stack spacing={1} direction="row" alignItems="center">
          <Button
            href={generatePath(AdminRoute.TOURNAMENTS_SINGLE, { id: params.row.id })}
            variant="contained"
            color="warning"
            size="small"
          >
            Редактировать
          </Button>
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
    axios.get(APIRoute.TOURNAMENTS)
      .then(({ data }) => {
        setRows(data.map(({ id, title, date, content }) => ({
          id,
          title,
          date,
          content: content && parse(removeTags(content)),
        })));
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  return (
    <>
      <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
        <Button
          variant="contained"
          color="success"
          href={AdminRoute.TOURNAMENTS_SINGLE}
        >
          Добавить новый
        </Button>
        {selection.length > 0 &&
          <Button
            variant="contained"
            color="error"
            onClick={handleDeleteSelectedButtonClick}
          >
            Удалить выбранные ({selection.length})
          </Button>
        }
      </Stack>

      <DataGrid
        sx={{ backgroundColor: 'white', height: 631 }}
        rows={rows}
        columns={columns}
        pageSize={10}
        rowsPerPageOptions={[10]}
        checkboxSelection
        disableSelectionOnClick
        experimentalFeatures={{ newEditingApi: true }}
        onSelectionModelChange={(newSelectionModel) => setSelection(newSelectionModel)}
        localeText={dataGridLocalText}
      />
    </>
  );
}

export default TournamentsDataGrid;
