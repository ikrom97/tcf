import { Box, Button, Grid, InputLabel, Stack, TextField } from '@mui/material';
import axios from 'axios';
import dayjs from 'dayjs';
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import { AdminRoute, APIRoute } from '../../../const';
import ImageField from './ImageField/ImageField';
import BodyField from './BodyField/BodyField';
import FileField from './FileField/FileField';

function TournamentForm({ tournament }) {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    if (tournament) {
      axios.post(APIRoute.TOURNAMENTS_UPDATE, new FormData(evt.target))
        .then(({ data }) => {
          toast.success(data.message);
        })
        .catch((error) => console.log(error));

      return;
    }

    axios.post(APIRoute.TOURNAMENTS, new FormData(evt.target))
      .then(({ data }) => {
        toast.success(data.message);
        navigate(AdminRoute.TOURNAMENTS);
      })
      .catch((error) => console.log(error));
  };

  return (
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
      }}
      onSubmit={handleFormSubmit}
      encType='multipart/form-data'
    >
      {tournament?.id && <input name="id" type="hidden" defaultValue={tournament.id} />}
      <Grid container spacing={2}>
        <Grid item xs={4}>
          <ImageField image={tournament?.image} />
        </Grid>

        <Grid item xs={8} display="flex" flexDirection="column" gap={2} justifyContent="flex-end">
          <Stack direction="row" spacing={2}>
            <TextField
              name="date"
              label="Дата"
              defaultValue={dayjs(tournament?.date).format('YYYY-MM-DD HH:mm') ?? dayjs().format('YYYY-MM-DD')}
              type="datetime-local"
              required
            />
            <FileField file={tournament?.file} />
          </Stack>
          <TextField
            fullWidth
            name="title"
            label="Название препарата"
            defaultValue={tournament?.title}
            type="text"
            required
          />
        </Grid>
      </Grid>

      <Grid item xs={12}>
        <InputLabel>Контент</InputLabel>
        <BodyField body={tournament?.content} />
      </Grid>

      <Grid item xs={12} display="flex" justifyContent="flex-end">
        <Button variant="contained" color="success" size="large" type="submit">Сохранить</Button>
      </Grid>
    </Box>
  );
}

export default TournamentForm;
