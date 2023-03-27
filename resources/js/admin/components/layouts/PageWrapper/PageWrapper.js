import { AppBar, Box, Container, Toolbar, Typography } from '@mui/material'
import { Outlet } from 'react-router';
import PageNavigation from '../PageNavigation/PageNavigation';

function PageWrapper() {
  return (
    <>
      <AppBar position="sticky">
        <Toolbar>
          <Typography variant="h6" component="h1">
            Админ панель Lady Healthcare
          </Typography>
        </Toolbar>
      </AppBar>

      <Box sx={{
        display: 'flex',
        flexGrow: '1',
        backgroundColor: 'rgba(0, 0, 0, 0.1)',
      }}>
        <PageNavigation />
        <Container
          disableGutters
          maxWidth="lg"
          sx={{ m: 4, ml: 6 }}
        >
          <Outlet />
        </Container>
      </Box>
    </>
  );
}

export default PageWrapper;
